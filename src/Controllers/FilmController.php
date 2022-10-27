<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Services/FilmService.php';

$film = new FilmService();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'Load') {

        $filmsList = $film->getFilmsList();

        echo json_encode($filmsList);
    }

    if ($_POST['action'] === 'SortByName') {
        $filmsByName = $film->getFilmsByName();
        echo json_encode($filmsByName);
    }

    if ($_POST['action'] === 'AddFilm') {
        $newFilm = $film->addFilm($_POST['data']);
        echo json_encode($newFilm);
    }

    if ($_POST['action'] === 'Delete') {
        $deleteFilm = $film->deleteFilm($_POST['id']);
        echo json_encode($deleteFilm);
    }

    if ($_POST['action'] === 'Import') {
        if (($_FILES) and (is_uploaded_file($_FILES['file']['tmp_name']))) {
            $importFile = $film->importData($_FILES['file']);
        }
        echo json_encode($importFile);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action'])) {
    if ($_GET['action'] == 'FilmById') {
        $filmDetails = $film->getFilmById($_GET['id']);
        echo json_encode($filmDetails);
    }
}

