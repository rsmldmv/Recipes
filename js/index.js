var prevID = '';
var menu_item = '';

// Accordion toggle logic
const accordionItems = document.querySelectorAll('.accordion-item');
const url = "index.php";

accordionItems.forEach(item => {
    item.addEventListener('click', function () {
        // Toggle the content display
        const content = this.querySelector('.content');
        content.style.display = content.style.display === 'block' ? 'none' : 'block';

        // Scroll the accordion section into view
        this.scrollIntoView({
            behavior: 'smooth', // for smooth scrolling
            block: 'start'      // scroll to the top of the section
        });
    });
});
//
//
//
function ShowSection(id) {
    var ele = document.getElementById(id);

    if (menu_item) {
        // Previous section to be hidden
        document.getElementById(menu_item).style.display = "none";
    }

    ele.style.display = "block";
    menu_item = ele.id;
}
//
//
//
function CloseAllAccordions() {
    var dinner = document.getElementById('breakfast');
    dinner.classList.remove('show');

    var dinner = document.getElementById('lunch');
    dinner.classList.remove('show');

    var dinner = document.getElementById('dinner');
    dinner.classList.remove('show');

    var dinner = document.getElementById('grid1');
    dinner.classList.remove('show');
}
//
//
//
function HideAllAccordions() {
    var seafood = document.getElementById('seafood');
    seafood.style.display = "none";

    var beef = document.getElementById('beef');
    beef.style.display = "none";

    var chicken = document.getElementById('chicken');
    chicken.style.display = "none";

    var grid1 = document.getElementById('grid1');
    grid1.style.display = "none";
}
//
//
//
function openLoginPage() {
    // Open login page as a popup window
    window.open('login-form.php', 'Login', 'width=400,height=380');
}

// function redirectAfterDelay(url, delay) {
//     document.getElementById('msg').display = "block";

//     setTimeout(function () {
//         window.location.href = url;
//     }, delay);
// }
