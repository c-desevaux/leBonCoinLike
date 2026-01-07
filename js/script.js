
console.log('JS chargé');

//Correction affichage fond input MacOS

document.querySelectorAll('input[type="text"], input[type="password"]').forEach(input => {
            if (navigator.platform.toUpperCase().indexOf('MAC') >= 0) {
                input.style.backgroundColor = '#fff'; // force le fond blanc
            }
        });


//back btn 
let btnBacks = document.querySelectorAll('.back');

btnBacks.forEach( btn => { btn.addEventListener('click', () => {
    history.back();
    })
});



