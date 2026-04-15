<?php
/* includes/DataBaseFunctions.php - PHIÊN BẢN TINH GỌN (CHỈ CÓ CRUD) */

// --- 1. HÀM TRUY VẤN CHUNG (HELPER) ---
function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

// --- 2. CÁC HÀM VỀ REVIEW (ĐÁNH GIÁ) ---
// ĐÃ CẬP NHẬT: Thêm LIMIT và OFFSET để phân trang
function allReviews($pdo, $limit = 50, $offset = 0) {
    $limit = (int)$limit;
    $offset = (int)$offset;
    $sql = "SELECT review.id, text, reviewer.name, film_name, image, email, rating FROM review 
            LEFT JOIN reviewer ON reviewerid = reviewer.id 
            LEFT JOIN film ON filmid = film.id
            ORDER BY review.id DESC 
            LIMIT $limit OFFSET $offset";
    return query($pdo, $sql)->fetchAll();
}

function totalReviews($pdo) {
    return query($pdo, 'SELECT COUNT(*) FROM review')->fetchColumn();
}

function getReview($pdo, $id) {
    return query($pdo, 'SELECT * FROM review WHERE id = :id', [':id' => $id])->fetch();
}

function insertReview($pdo, $text, $image, $reviewerid, $filmid, $rating) {
    $sql = 'INSERT INTO review SET text = :text, date = CURDATE(), image = :image, 
            reviewerid = :reviewerid, filmid = :filmid, rating = :rating';
    query($pdo, $sql, [':text' => $text, ':image' => $image, ':reviewerid' => $reviewerid, ':filmid' => $filmid, ':rating' => $rating]);
}

function updateReview($pdo, $id, $text, $reviewerid, $filmid, $rating) {
    $sql = 'UPDATE review SET text = :text, reviewerid = :reviewerid, filmid = :filmid, rating = :rating WHERE id = :id';
    query($pdo, $sql, [':text' => $text, ':reviewerid' => $reviewerid, ':filmid' => $filmid, ':rating' => $rating, ':id' => $id]);
}

function deleteReview($pdo, $id) {
    query($pdo, 'DELETE FROM review WHERE id = :id', [':id' => $id]);
}

// --- 3. CÁC HÀM VỀ FILM (PHIM) ---
function allFilms($pdo) {
    return query($pdo, 'SELECT * FROM film')->fetchAll();
}

function totalFilms($pdo) {
    return query($pdo, 'SELECT COUNT(*) FROM film')->fetchColumn();
}

function getFilm($pdo, $id) {
    return query($pdo, 'SELECT * FROM film WHERE id = :id', [':id' => $id])->fetch();
}

function insertFilm($pdo, $film_name) {
    $sql = 'INSERT INTO film SET film_name = :film_name';
    query($pdo, $sql, [':film_name' => $film_name]);
}

function updateFilm($pdo, $id, $film_name) {
    $sql = 'UPDATE film SET film_name = :film_name WHERE id = :id';
    query($pdo, $sql, [':film_name' => $film_name, ':id' => $id]);
}

function deleteFilm($pdo, $id) {
    query($pdo, 'DELETE FROM film WHERE id = :id', [':id' => $id]);
}

// ĐÃ THÊM: Hàm tìm kiếm phim theo từ khóa
function searchFilms($pdo, $keyword) {
    $sql = 'SELECT * FROM film WHERE film_name LIKE :keyword';
    return query($pdo, $sql, [':keyword' => '%' . $keyword . '%'])->fetchAll();
}

// --- 4. CÁC HÀM VỀ REVIEWER (USERS) ---
function allReviewers($pdo) {
    return query($pdo, 'SELECT * FROM reviewer')->fetchAll();
}

function totalReviewers($pdo) {
    return query($pdo, 'SELECT COUNT(*) FROM reviewer')->fetchColumn();
}

function getReviewer($pdo, $id) {
    return query($pdo, 'SELECT * FROM reviewer WHERE id = :id', [':id' => $id])->fetch();
}

function updateReviewer($pdo, $id, $name, $email) {
    query($pdo, 'UPDATE reviewer SET name = :name, email = :email WHERE id = :id', [':name' => $name, ':email' => $email, ':id' => $id]);
}

function deleteReviewer($pdo, $id) {
    query($pdo, 'DELETE FROM reviewer WHERE id = :id', [':id' => $id]);
}
?>