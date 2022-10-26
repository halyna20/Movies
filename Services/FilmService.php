<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Repositories/FilmRepository.php';

class FilmService
{
    protected FilmRepository $film;

    public function __construct()
    {
        $this->film = new FilmRepository();
    }

    public function getFilmsList()
    {
        $filmsList = $this->film->getAllFilms();

        return $filmsList;
    }

    public function getFilmsByName()
    {
        $filmsByName = $this->film->getFilmsByName();

        return $filmsByName;
    }

    public function addFilm($data)
    {
        $output = [];
        foreach ($data as $value) {
            switch ($value['name']) {
                case "name":
                    $title = $this->checkInput($value['value']);
                    break;
                case "year":
                    $year = $this->checkInput($value['value']);
                    break;
                case "format":
                    $format = $this->checkInput($value['value']);
                    break;
                case "stars":
                    $stars = $this->checkInput($value['value']);
                    break;
                case "description":
                    $description = $this->checkInput($value['value']);
                    break;
            }
        }

        $newFilm = $this->film->addFilm($title, $year, $format, $stars, $description);
        if ($newFilm) {
            $output = array('message' => 'Фільм успішно додано');
        }

        return $output;
    }

    public function deleteFilm($id)
    {
        $id = $this->checkInput($id);
        $deleteFilm = $this->film->deleteFilm($id);
        $output = [];

        if ($deleteFilm) {
            $output = array('message' => 'Фільм видалено!');
        }

        return $output;
    }

    public function getFilmById($id)
    {
        $id = $this->checkInput($id);
        $filmById = $this->film->getFilmById($id);

        if ($filmById["frame"]) {
            $movieFrame = array_diff(scandir($_SERVER['DOCUMENT_ROOT'] . $filmById["frame"], 1), array('..', '.'));
            $filmById["movieFrame"] = $movieFrame;
        }

        return $filmById;
    }

    public function search($value)
    {
        $value = $this->checkInput($value);
        $searchResult = $this->film->search($value);

        return $searchResult;
    }

    public function importData($file)
    {
        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';

        $original_name = $file['name'];
        $split_filename = explode('.', $original_name);
        $extension = end($split_filename);
        $array_ext_access = array('doc', 'docx', 'txt');
        $is_check = array_search($extension, $array_ext_access);

        $uniquesavename = time() . uniqid(rand());
        $uploadfile = $uploaddir . $uniquesavename . '.' . $extension;

        $output = "";
        if ($is_check) {
            if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
                $txt_file = file_get_contents($uploadfile);

                $txt_file = rtrim(preg_replace("/[\r\n]+/m", "\r\n", $txt_file));
                $rows = explode("\n", $txt_file);

                foreach ($rows as $row => $data) {
                    //get row data
                    $row_data = explode(':', $data, 2);

                    $info[$row][$row_data[0]] = trim($row_data[1]);
                }
                $arrFilms = array_chunk($info, 4);


                for ($i = 0; $i < count($arrFilms); $i++) {
                    $title = $arrFilms[$i][0]['Title'];
                    $year = $arrFilms[$i][1]['Release Year'];
                    $format = $arrFilms[$i][2]['Format'];
                    $stars = $arrFilms[$i][3]['Stars'];
                    if ($title != NULL && $year != NULL && $format != NULL && $stars != NULL) {
                        $import = $this->film->importData($title, $year, $format, $stars);
                    } else {
                        $output = array('error' => 'Виявлено проблеми у файлі');
                    }
                }
            }
        } else {
            throw new Exception('Можлива атака з допомогою завантаження файлу');
        }
        if ($import) {
            $output = array('message' => 'Імпорт даних здійснено');
        }
        return $output;
    }

    protected function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
}