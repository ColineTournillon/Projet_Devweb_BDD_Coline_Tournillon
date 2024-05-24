const PixelColors = 
{
    NONE: "none",
    BLACK: "black",
    WHITE: "white",
    RED: "red",
    BLUE: "blue",
    GREEN: "green",
    ORANGE: "orange",
    YELLOW: "yellow",
    PURPLE: "purple",
    PINK: "pink",
}

// Lance le jeu lorsque la page est chargée
window.addEventListener("load", run);

// fonction du jeu
function run()
{    
    generateGrid();
    attachPixelsEvent();
    savePixel();
}
 

function generateGrid()
{
    const parent = document.querySelector("pixel-parts");

    if (parent === null)
        return;

    for (let i = 0; i < 900; ++i)
    {
        parent.appendChild(createGrid());
    }
    //refreshPage();
}

function createGrid()
{
    const pixel = document.createElement("pixel-part");
    pixel.addEventListener("click", onPixelClick);

    return pixel;
}



function onPixelClick(event)
{
    const pixel = event.target;
    const activePixelColor = getActivePixel();

    if (activePixelColor === PixelColors.BLACK)
        paintBlack(pixel);
    else if (activePixelColor === PixelColors.WHITE)
        paintWhite(pixel);
    else if (activePixelColor === PixelColors.RED )
        paintRed(pixel);
    else if (activePixelColor === PixelColors.BLUE)
        paintBlue(pixel);
    else if (activePixelColor === PixelColors.GREEN)
        paintGreen(pixel);
    else if (activePixelColor === PixelColors.ORANGE)
        paintOrange(pixel);
    else if (activePixelColor === PixelColors.YELLOW)
        paintYellow(pixel);
    else if (activePixelColor === PixelColors.PURPLE)
        paintPurple(pixel);
    else if (activePixelColor === PixelColors.PINK)
        paintPink(pixel);

}


function paintRed(pixel)
{
    pixel.classList.add("red");
}


function paintBlack(pixel)
{
    pixel.classList.add("black");
}


function paintWhite(pixel)
{
    pixel.classList.add("white");
}


function paintBlue(pixel)
{
    pixel.classList.add("blue");
}


function paintGreen(pixel)
{
    pixel.classList.add("green");
}


function paintOrange(pixel)
{
    pixel.classList.add("orange");
}

function paintYellow(pixel)
{
    pixel.classList.add("yellow");
}

function paintPurple(pixel)
{
    pixel.classList.add("purple");
}

function paintPink(pixel)
{
    pixel.classList.add("pink");
}

function attachPixelsEvent()
{
    const pixelColors = document.querySelectorAll("pixelColor");

    for (const pixelColor of pixelColors)
    {
        pixelColor.addEventListener("click", enablePixel);
    }
}

function enablePixel(event)
{
    disableActivePixel();

    event.target.classList.add("active");
}

function disableActivePixel()
{
    const activePixelHTML = document.querySelector("pixelColor.active");
    activePixelHTML?.classList.remove("active");
}

function getActivePixel()
{
    const activePixelHTML = document.querySelector("pixelColor.active");
    let activePixelColor = PixelColors.NONE;

    switch (activePixelHTML.id)
    {
        case "pixel-black": activePixelColor = PixelColors.BLACK; break;
        case "pixel-white": activePixelColor = PixelColors.WHITE; break;
        case "pixel-red": activePixelColor = PixelColors.RED; break;
        case "pixel-blue": activePixelColor = PixelColors.BLUE; break;
        case "pixel-green": activePixelColor = PixelColors.GREEN; break;
        case "pixel-orange": activePixelColor = PixelColors.ORANGE; break;
        case "pixel-yellow": activePixelColor = PixelColors.YELLOW; break;
        case "pixel-purple": activePixelColor = PixelColors.PURPLE; break;
        case "pixel-pink": activePixelColor = PixelColors.PINK; break;
    }

    return activePixelColor;
}

function refreshPage() 
{
    setTimeout(function(){location.reload();}, 5000);
}


function savePixel() 
{
    const pixel = document.querySelector("pixelColor");
    pixel.addEventListener('click', function(event) 
    {
        if (event.target.classList.contains('pixelColor')) 
        {
            // Récupère les coordonnées du clic 
            const pixelColor = event.target;
            const x = pixelColor.dataset.row;
            const y = pixelColor.dataset.col;

            // Définit la couleur de fond de la cellule
            pixelColor.style.backgroundColor = selectedColor;
    

        // Crée un objet contenant les données du pixel
            var pixelData = 
            {
                x: x,
                y: y,
                couleur: selectedColor, 
            };


            // Envoie les données du pixel au serveur
            fetch('../php/sauvegarde_pixel.php', 
            {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(pixelData),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    });
}


