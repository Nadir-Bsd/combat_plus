// get the stats of the player and the enemy
const heroSpan = document.querySelectorAll('.hero');
const monsterSpan = document.querySelectorAll('.monster');

// set up hero and monster hp
var heroHp = heroSpan[1].textContent;
var monsterHp = monsterSpan[1].textContent;
var intervalId;

// do event when user press space barre to attack
document.addEventListener('keyup', heroAttack);
document.addEventListener('DOMContentLoaded', monsterAttack);

// when user press space barre, the hero attack the monster
function heroAttack(e) {
    if (e.code === "Space") {
        if(monsterHp > 0 && heroHp > 0) {
            monsterHp -= heroSpan[2].textContent;
            monsterSpan[1].textContent = monsterHp;
        }
        
        if(monsterHp <= 0){
            monsterHp = 0;
            monsterSpan[1].textContent = monsterHp;
            // clear the interval
            clearInterval(intervalId);
            // game over
            // redirection to previous page
            window.location.href = "./heros.php?victory=hero";
        }
    }
}

// all 1 sec, the monster attack the hero
function monsterAttack() {

    // check if an interval has already been set up
    if (!intervalId) {
      intervalId = setInterval(() => {
        if(heroHp > 0) {
            heroHp -= monsterSpan[2].textContent;
            heroSpan[1].textContent = heroHp;
        } 

        // if the hero hp is less than 0, set it to 0 and clear the interval
        if (heroHp <= 0){
            heroHp = 0;
            heroSpan[1].textContent = heroHp;
            // clear the interval
            clearInterval(intervalId);
            // game over
            window.location.href = "./heros.php?victory=monster";
        }
      }, 1000);
    }
  }

