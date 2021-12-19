<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

if(IsAdmin($_SESSION["id"], $userid))
        {

            if($_SESSION["id"] != 23)
            {


            Payload::DeletePayload($_GET['id']);


        }else{
            if($_GET['id'] == 129 || $_GET['id'] == 100)
            {
                die("non");
            }else{
                Payload::DeletePayload($_GET['id']);
            }
        }

        }else{
        	$rref = $GLOBALS['DB']->GetContent("payload", ["id" => $_GET['id']])[0];

             if(html_entity_decode($rref["userid"]) == $_SESSION['id'])
             {
             	Payload::DeletePayload($_GET['id']);
			}else{
				die("Sa ne t'appartient pas mec :/");
			}

        }

?>