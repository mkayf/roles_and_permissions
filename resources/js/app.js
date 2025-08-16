import "./bootstrap";

const btn = document.querySelector("button.mobile-menu-button");
const menu = document.querySelector(".mobile-menu");

btn.addEventListener("click", () => {
    menu.classList.toggle("hidden");
});


if(window.location.pathname.includes('/dashboard/users')){
    let roleAssignModal = document.getElementById('role-assign-modal');
    let roleAssignBtn = document.querySelectorAll('.role-assign-btn');
    roleAssignBtn.forEach(btn => {
        btn.addEventListener('click', (event) => {
            let userId = event.target.dataset.userId;
            document.querySelector('.modal-id-input').value = userId;
            document.querySelector
            roleAssignModal.classList.remove('hidden');
        });
    });
}