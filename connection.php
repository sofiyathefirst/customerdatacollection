<?php
                    $servername='localhost';
                    $username='root';
                    $password='';
                    $database='jtsb_customer_data_collection';

                    //create database connection
                    $connection = new mysqli($servername, $username, $password, $database);

                    //check connection status
                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }

                    
?>