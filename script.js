// for dropdown meny
const dropdownToggle = document.querySelector('.dropdown');

// dropdown
dropdownToggle.addEventListener('mouseover', function () {
    const dropdownContent = this.querySelector('.dropdown-content');
    dropdownContent.style.display = 'block';
});

// display forsvinner (dropdown gone whoa!)
dropdownToggle.addEventListener('mouseout', function () {
    const dropdownContent = this.querySelector('.dropdown-content');
    dropdownContent.style.display = 'none';
});




// fires when the HTML document has been completely parsed, and all deferred scripts-
// ( <script defer src="…"> and <script type="module"> ) have downloaded and executed.
document.addEventListener('DOMContentLoaded', function() {
  // Select the element to fade in and out
  elementToFade.addEventListener('animationend', function() {
    // Check if the animation is the fade-out part
    if (!elementToFade.classList.contains('elementToFadeInAndOut')) {
      // Remove the element from the DOM
      elementToFade.remove();
    }
  });
  // Trigger the fade-in/fade-out animation
  setTimeout(function() {
    elementToFade.classList.toggle('elementToFadeInAndOut');
  }, 4000); // 4 sekunder
});

  


let playerProgress = 0;
let money = 500;
let mood = 30; // 1 is bad, 100 is happi
let isTyping = false; // Flag to prevent multiple animations

// handleChoice, funksjon brukt for nye valg etter den ene.
// mindre tungvindt slikt

function handleChoice(choiceText, thoughtText, questionText, choicesHTML) {
    playerProgress = 0;

    // document.querySelector('img').src = imageSource;
    // const scene = document.querySelector('img').src = imageSource;
    const storyText = document.querySelector('.story-text.text1');
    const storyThoughts = document.querySelector('.story-thoughts.text1');
    const storyQuestion = document.querySelector('.story-question.text1');

    // spiller sammen med handleChoice, hvor den har en typing effekt.
    // en duration, som at ikke animasjoner overlapper og avbryter / sprer utover.
    // hvis typing er falsk:
    if (!isTyping) {
        
        
        isTyping = true;

        // Enkelt, fjerner eksisterende animasjoner
        storyText.style.animation = 'none';
        storyThoughts.style.animation = 'none';
        storyQuestion.style.animation = 'none';

        // Fjerner eksisterende innhold
        storyText.textContent = '';
        storyThoughts.textContent = '';
        storyQuestion.textContent = '';

        // starter typing med den nye teksten
        typeText(storyText, choiceText, 0);
        typeText(storyThoughts, thoughtText, 0);
        typeText(storyQuestion, questionText, 0);

        // oppdateres 
        document.querySelector('.choices').innerHTML = choicesHTML;

        // Reset the typing flag after the animation finishes
        setTimeout(() => {
            isTyping = false;
        }, 2000); // 2 sek
    }
}

// Om du trykker start over uheldigvis, da kan du avbryte
// 2 sekunder countdown eller 0 og 1 som er 2 sekunder.
let resetConfirmed = false;
let resetTimer = null;
let countdown = 1;

function startCountdown() {
    const confirmationMessage = document.getElementById('confirmationMessage');
    const yesButton = document.getElementById('yesButton');
    const countdownTimer = document.getElementById('countdownTimer');

    const updateMessage = () => {
        confirmationMessage.textContent = `Are you sure you want to start over?`;
    };

    updateMessage(); // melding blir kalt

    countdownTimer.textContent = `Countdown: ${countdown} seconds`; 

    resetTimer = setInterval(() => {
        if (countdown > 0) {
            countdown--; // minus, går fra 1-0(2 sekunder)
            updateMessage();
            countdownTimer.textContent = `Countdown: ${countdown} seconds`;
        } else {
            clearInterval(resetTimer);
            countdown = 1; // Reset the countdown
            countdownTimer.textContent = ''; // Remove the countdown
            yesButton.textContent = 'Yes'; // Restore the "Yes" label
            yesButton.disabled = false; // Enable the "Yes" button
            yesButton.classList.remove('greyButton'); // Remove the greyButton class
            yesButton.classList.add('blueButton'); // Add the blueButton class
            resetConfirmed = true; // Set resetConfirmed to true after the countdown
        }
    }, 1000); // 1-second interval fordi den slutter på 0 som også er et sekund
}

function cancelResetTimer() {
    if (resetTimer) {
        clearInterval(resetTimer);
        countdown = 2; // resetter 
        const countdownTimer = document.getElementById('countdownTimer');
        countdownTimer.textContent = ''; // Nedtellingen forsvinner i div'en.
        const confirmationMessage = document.getElementById('confirmationMessage');
        confirmationMessage.textContent = 'Are you sure you want to start over?'; // Hele div'en om å resette go bye. (forsvinner)
        resetTimer = null;
    }
}

// Reset game jaja
function resetGame() {

    // uten confirmation panelen, bare fjern if'en og de siste valuene.
    if (resetConfirmed) {

        handleChoice(
            // 'scene1.jpg',
            'You wake up, looking up at the ceiling.',
            '"I feel exhausted.."',
            'Which choice would you prefer?',
            `
            <button class="btnChoice" onclick="getUp()">Get up from the bed.</button>
            <button class="btnChoice" onclick="lieStill()">Lie still, get more sleep</button>
            `
        );

        // Resetter disse valuene også
        resetConfirmed = false;
        resetTimer = null;
    }
}

// Henter knappene
const modal = document.getElementById('confirmationModal');
const cancelButton = document.getElementById('cancelButton');
const yesButton = document.getElementById('yesButton');

// Legger til knapp interaktivitet
document.querySelector('.reset').addEventListener('click', () => {
    modal.style.display = 'block';
    startCountdown();
});

// samme 
cancelButton.addEventListener('click', () => {
    modal.style.display = 'none';
    cancelResetTimer(); // ingen countdown
});

// samme
yesButton.addEventListener('click', () => {
    if (yesButton.disabled || !resetConfirmed) {
        return; // hvis knappen ikke kan bli klikket, kan ikke resette
    }
    modal.style.display = 'none';
    resetGame();
});



function getUp() {
    playerProgress = 1;

    handleChoice(
        // 'scene2.jpg',
        'You get up from the bed, tired as ever.',
        '"I want to go back to sleep.."',
        'What do you do first in the morning?',
        `
        <button class="btnChoice" onclick="walkBathroom()">Walk to the bathroom</button>
        <button class="btnChoice" onclick="walkKitchen()">Walk to the kitchen</button>
        <button class="btnChoice" onclick="lieStill()">Lie down again.</button>
        `
    );    

}

function walkBathroom() {

    playerProgress = 2;

    // const choiceText = 'You walk to the bathroom, now staring at the reflection of yourself.';
    // const thoughtText = '"I should have slept earlier last night.. Those eyebags are not doing it"';
    // const questionText = 'Choose your first action in the bathroom.';
    // const choicesHTML = `
    //     <button class="btnChoice" onclick="brushTeeth()">Brush your teeth</button>
    //     <button class="btnChoice" onclick="stareReflection()">Stare back at your reflection</button>
    //     <button class="btnChoice" onclick="walkBackBed()">Walk back to your bed</button>
    // `;

    // handleChoice(choiceText, thoughtText, questionText, choicesHTML);

    handleChoice(
        // 'scene2.jpg',
        'You walk to the bathroom, now staring at the reflection of yourself.',
        '"I should have slept earlier last night.. Those eyebags are not doing it"',
        'Choose your first action in the bathroom.',
        `
        <button class="btnChoice" onclick="brushTeeth()">Brush your teeth</button>
        <button class="btnChoice" onclick="stareReflection()">Stare back at your reflection</button>
        <button class="btnChoice" onclick="walkBackBed()">Walk back to your bed</button>
        `
    ); 
}

function walkKitchen() {
    playerProgress = 2;

    handleChoice(
        // 'scene4.jpg',
        'You walk to the kitchen, feeling a little hungry.',
        '"I should have slept earlier last night.. Perhaps some food would wake me up."',
        'Choose your first action in the kitchen.',
        `
        <button class="btnChoice" onclick="openFridge()">Open the fridge</button>
        <button class="btnChoice" onclick="takeCereal()">Take some cereal</button>
        <button class="btnChoice" onclick="walkBackBed()">Walk back to your bed</button>
        `
    );
}

function openFridge() {

    handleChoice(
        // 'scene5.png or whatevre

        'You got enough ingredients to make a good breakfast. But it will take you an hour or more for you.',
        '"Work starts in 1 and a half hour, and I live 10 minutes away.."',
        'What do you do?',
        `
        <button class="rngBtn" onclick="rngBreakfast()">Make a full breakfast</button>
        <button class="btnChoice" onclick="takeCereal()">Go for cereal</button>
        `
        )
}

function rngBreakfast() {

    // genererer et nummer fra 0 til 1.
    let randomNumber = Math.random();
    
    // hvis nummeret er lavere en 0.5:
    if (randomNumber < 0.5) {
        handleChoice(
            'You made a delicious and satisfying full breakfast! Within exactly an hour too!',
            '"Thankfully made it in time, it was totally worth the risk."',
            'You successfully avoided being late for work!',
            `<p class="animated-text">>>></p>`
        );
    // hvis nummeret er hoyere enn 0.5:
    } else {
        
        handleChoice(
            'Your attempt at making breakfast didn\'t go as planned.',
            '"Now you`re running late for work!"',
            'You might need to grab something quick and head out.',
            `<p class="animated-text">>>></p>`
        );
    }    
}

function takeCereal() {
    handleChoice(
        'You grabbed a box of cereal and poured yourself a quick breakfast.',
        '"This is a time-saver, and you can eat it on the go."',
        'You managed to leave on time for work!'
    );
}

function walkBackBed() {
    handleChoice(
        // 'scene4.jpg',
        'For some reason, you walk back to your bed',
        '"I want to sleep more"',
        'Judge the choices you have, and pick the wisest.',
        `
        <button class="btnChoice" onclick="openFridge()">Walk to the bathroom</button>
        <button class="btnChoice" onclick="walkKitchenTwo()">Walk to the kitchen</button>
        <button class="btnChoice" onclick="lieStill()">Lie down</button>
        `
    );
}

function walkKitchenTwo() {

    handleChoice(
        // 'scene4.jpg',
        'You walk to the kitchen, feeling more hungry.',
        '"I should have slept earlier last night.. Perhaps some food would wake me up."',
        'Choose your first action in the kitchen.',
        `
        <button class="btnChoice" onclick="openFridge()">Open the fridge</button>
        <button class="btnChoice" onclick="takeCereal()">Take some cereal</button>
        <button class="btnChoice" onclick="walkBackBed()">Walk back to your bed</button>
        `
    );
}

function lieStill() {

    handleChoice(
        // 'scene3.jpg',
        'You go back to sleep, but wake up 5 hours later! Now you are 2 hours late for work!',
        '"Oh sh*t!! I shouldn`t have went back to sleep!!"',
        'What do you do now?? This will make the REALLY boss mad..',
        `
        <button class="btnChoice" onclick="quickGetUp()">Quickly get up</button>
        <button class="btnChoice" onclick="callExcuse()">Make up an excuse</button>
        <button class="btnChoice" onclick="backToSleep()">Go back to sleep</button>
        `
    );    

}

function backToSleep() {

    handleChoice(
        // 'scene3.jpg',
        'You went back to sleep and wake up to a message by your boss: "You are fired!".',
        '"Oh no! Going back to sleep was a stupid choice, why did I do that.."',
        'You lost your job, and motivation to live. Massive L btw.',
        `<button class="btnChoice" onclick="miau1()">miau1</button>
        <button class="btnChoice" onclick="miau2()">miau2</button>
        <button class="btnChoice" onclick="miau3()">miau3</button>
        `
    ); 
}



// typeing animasjon, sammen med css, ikke en kode jeg lagde selv.
// dette er grunnen til hvorfor jeg har nedtelling, som at den ikke overlapper.
function typeText(element, text, delay) {
    element.textContent = ''; // textContent, hvor jeg har all text blir til ingenting først.
    let charIndex = 0; // Posisjonen innenfor stringen text, slik at neste tegn legges til.
    const typingInterval = 1000; // Tar 1 sek for all text
    const steps = 55; // Steps, at den beveger seg som "steps", og ikke smoothly. (det gir den en typewriter effekt)

    function type() {
        // hvis charI (0) er mindre en text length -> 
        if (charIndex < text.length) {
            const stepSize = Math.ceil(text.length / steps); // text-length delt på steps også rundet slik at d blir heltall (Z)
            element.textContent += text.substring(charIndex, charIndex + stepSize); // legger til ny innholdet i htmlen.
            charIndex += stepSize;
            setTimeout(type, typingInterval / steps); // funk. settimeout, type, også 1 sek (typeI) delt på steps. Steps som kommer på 1 sekund.
        }
    }

    // funksjonen setTimeout: funk. type er spilt forst også delay etter.
    setTimeout(type, delay);
}

