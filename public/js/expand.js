let show = false;
const toggleBtn = document.querySelector("#toggle-all");
toggleBtn.innerText = show ? "Hide All" : "Expand All";
toggleBtn.addEventListener("click", () => expandAll());

const changeText = () => {};

const expandAll = () => {
    const expandable = document.querySelectorAll(".show-all");
    show = !show;
    toggleBtn.innerText = show ? "Hide All" : "Expand All";
    expandable.forEach((element) => {
        if (show) {
            element.classList = "collapse show show-all";
        } else {
            element.classList = "collapse show-all";
        }
    });
};
