"use strict";
document.addEventListener("DOMContentLoaded", function () {
    // body variable
    const body = document.body;
    // three bar button variable
    const showMenuItem = document.getElementById("showMenuItem");
    const menuItem = document.getElementById("menuItem");

    // download resume btn on about page for about.blade.php
    const resume_download_btn_elm=document.querySelector(".resume_download_btn")

    // read-more button variable on about page for about.blade.php
    const aboutProject = document.querySelectorAll(".about-project");

    // three bar button click function
    if (showMenuItem) {
        const showMenuItemValidation = (event) => {
            event.preventDefault();
            menuItem.classList.toggle("active");
            showMenuItem.classList.toggle("active");
            body.classList.toggle("hide");
            const forI=showMenuItem.querySelector("i");
            // console.log(forI);
            if(forI.classList.contains("fa-bars")){
                forI.classList.replace("fa-bars", "fa-xmark")
            }else {
                forI.classList.replace("fa-xmark", "fa-bars");
            }
        };
        showMenuItem.addEventListener("click", showMenuItemValidation);
    }

    // download resume button click handler
    if (resume_download_btn_elm && resumePath) {
        resume_download_btn_elm.addEventListener("click", (event)=>{
            event.preventDefault();
            const link=document.createElement("a");
            link.href=resumePath;
            link.download="pawan-dev.pdf";
            link.dispatchEvent(new MouseEvent("click"));
        })
    }

    // read-more button function
    if (aboutProject) {
        aboutProject.forEach((project) => {
            let readMoreBtn = project.querySelector(".read-more-btn");
            const minHeight = project.querySelector(".min-height");
            project.addEventListener("click", function () {
                if (event.target.classList.contains("read-more-btn")) {
                    minHeight.classList.toggle("active");
                    if (readMoreBtn.textContent === "Read More") {
                        readMoreBtn.textContent = "Read Less";
                    } else {
                        readMoreBtn.textContent = "Read More";
                    }
                }
            });
        });
    }
});
