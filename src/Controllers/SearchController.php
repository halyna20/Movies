<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Services/FilmService.php';

$film = new FilmService();

if(isset($_GET['action']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    if($_GET['action'] === 'Search') {
        $searchResult = $film->search($_GET['search']);
        if (!$searchResult) {
            $output['error'] = 'Фільм не знайдено';
            echo json_encode($output);
        } else {
            echo json_encode($searchResult);
        }
    }
}