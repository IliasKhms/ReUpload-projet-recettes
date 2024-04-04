const stars = document.querySelectorAll('.fa-star');
const note = document.getElementById('note');

init();
function init() {
    stars.forEach((star)=> {
        star.addEventListener('click', saveRating);
        star.addEventListener('mouseover', addHover);
        star.addEventListener('mouseout', removeHover);
    });
}
function saveRating(e) {
    removeEventListenerToAllStar();
    console.log(e.target.dataset.star);
    note.innerText = e.target.dataset.star;

}

function removeEventListenerToAllStar(){
    stars.forEach((star)=> {
        star.removeEventListener('click', saveRating);
        star.removeEventListener('mouseover', addHover);
        star.removeEventListener('mouseout', removeHover);
    });
}


function addHover(e,css = "checked") {
        const hoveredStar = e.target;
        hoveredStar.classList.add(css);
        const starLeft = getStarleft(hoveredStar); 
        //console.log("starLeft",starLeft);
       
        starLeft.forEach((star)=>{
            star.classList.add(css);
        });
    }


function removeHover(e,css = "checked") {
    const hoveredStar = e.target;
    const starLeft = getStarleft(hoveredStar);
    starLeft.forEach((star)=>{
        star.classList.remove(css);
    });
  e.target.classList.remove(css);  
    
}

function getStarleft(star){
    let starLeft = [];
    const spanNodeType = 1;
    while(star = star.previousElementSibling){
        if(star.nodeType === spanNodeType && star.classList.contains('fa-star')){
            starLeft.unshift(star);
        }
    }
    return starLeft;
}


/*function rateRecipe(note, recipeId) {
    fetch('/rate', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            // user_id is always 1 until implementation of authentication
            recipe_id: recipeId,
            rating: note
        })
    })
    .then(response => response.json())
    .then(data => {
        e.target.dataset.star ; // update the stars
    })
    .catch((error) => {
        console.error('Error:', error);
    });
    stars.forEach(star => {
        star.addEventListener('click', function(e) {
            // Obtenez la note à partir de l'attribut data-star de l'étoile
            const rating = e.target.getAttribute('data-star');
    
            // Obtenez l'ID de la recette à partir de l'attribut data-recipe-id de l'étoile
            const recipeId = 1;
    
            // Appelez la fonction rateRecipe avec la note et l'ID de la recette
            rateRecipe(rating, recipeId);
        });
    })
}
*/

function rateRecipe(note, recipeId) {
    fetch('/recettes/' + recipeId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            // Utilisez la note passée en paramètre
            rating: note
        })
    })
    .then(response => response.json())
    .then(data => {
        // Mettez à jour les étoiles si nécessaire
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

stars.forEach(star => {
    star.addEventListener('click', function(e) {
        // Obtenez la note à partir de l'attribut data-star de l'étoile
        const rating = e.target.dataset.star;

        // Obtenez l'ID de la recette à partir de l'attribut data-recipe-id de l'étoile
        const recipeId = e.target.dataset.recipeId;

       
    });
});

document.querySelectorAll('.star').forEach(function(star) {
    star.addEventListener('click', function() {
        const rating = this.getAttribute('data-star');
        document.getElementById('rating').value = rating;
    });
});

