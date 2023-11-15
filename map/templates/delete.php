<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $confirmation = isset($_GET["confirm"]) ? $_GET["confirm"] : false;

    if ($confirmation) {
        // User confirmed the deletion
        $sql = "DELETE FROM `forms` WHERE id = $id";
        $result = $conn->query($sql);

        if ($result) {
            header("Location: index.php?msg=Data deleted successfully");
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    } else {
        // Display a blurred background overlay and a pop-up modal with user details
        $userDetails = getUserDetails($id);

        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Delete Confirmation</title>
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    margin: 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                    background: url('background.jpg') center/cover; /* Replace 'background.jpg' with your background image */
                    overflow: hidden;
                }

                .overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.5); /* Transparent background overlay */
                    backdrop-filter: blur(8px); /* Blurred background effect */
                    z-index: 1;
                }

                .confirmation-box {
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    z-index: 2;
                    background-color: transparent; /* Set the background to transparent */
                    text-align: center;
                }

                .confirmation-content {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                .confirm-btn, .cancel-btn {
                    padding: 10px 20px;
                    margin: 0 10px;
                    cursor: pointer;
                    border: none;
                    border-radius: 4px;
                    font-size: 16px;
                }

                .confirm-btn {
                    background-color: #4caf50;
                    color: #fff;
                }

                .cancel-btn {
                    background-color: #f44336;
                    color: #fff;
                }
            </style>
        </head>
        <body>
            <div class='overlay'></div>
            <div class='confirmation-box'>
                <div class='confirmation-content'>
                    <p>Are you sure you want to delete the user with the following details?</p>
                    <p>ID: {$userDetails['id']}</p>
                    <p>Last Name: {$userDetails['last_name']}</p>
                    <p>First Name: {$userDetails['first_name']}</p>
                    <button class='confirm-btn' onclick=\"window.location.href='delete.php?id=$id&confirm=true'\">Yes</button>
                    <button class='cancel-btn' onclick=\"window.location.href='index.php?msg=Deletion canceled'\">No</button>
                </div>
            </div>
        </body>
        </html>";
    }
} else {
    header("Location: index.php?msg=Invalid request");
}

function getUserDetails($id) {
  global $conn;
  $sql = "SELECT id, last_name, first_name FROM `forms` WHERE id = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($result) {
      return $result;
  } else {
      $errorInfo = $stmt->errorInfo();
      echo "Error retrieving user details: " . $errorInfo[2];
  }

  return [];
}


