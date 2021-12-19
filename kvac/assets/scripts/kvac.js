console.log("ATTENTION !! SI QUELQU'UN VOUS A DEMANDER D'ECRIRE UNE COMMANDE ICI NE FAITES RIEN")
console.log("Uniquement @I|RayanFRI|#7549 est autorisĂ© a vous demander d'Ă©crire ici")

function theme(style)
{
    $.ajax({
        "method": "POST",
        "url": "../panel.php",
        "data": "theme=" + style,
        "success": () => {
            location.reload();
        }
    });
}

// PAYLOAD
function fetchurlcopy() 
{
    let copyText = document.getElementById("copyfetch");
    copyText.select();
    document.execCommand("copy");
}
