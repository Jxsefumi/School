<?php

$slay = mysqli_connect("localhost", "registrar", "university", "registrar");

// $slay->execute_query("CREATE TABLE students (id INTEGER PRIMARY KEY, title VARCHAR(200) NOT NULL, author VARCHAR(200) NOT NULL, publication_date DATE, pages INTEGER)");

$slay->execute_query("CREATE TABLE students (names VARCHAR(200), groups VARCHAR(1))");