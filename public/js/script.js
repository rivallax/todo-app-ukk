document.addEventListener("DOMContentLoaded", () => {
    const content = document.getElementById("content");
    const navbarHeight = document.querySelector(".navbar").offsetHeight;
    content.style.paddingTop = `${navbarHeight + 16}px`;

    const addTaskModal = document.getElementById("addTaskModal");
    addTaskModal.addEventListener("show.bs.modal", (e) => {
        const btn = e.relatedTarget;
        const taskId = btn.getAttribute("data-list");
        document.getElementById("taskListId").value = taskId;
    });
});
