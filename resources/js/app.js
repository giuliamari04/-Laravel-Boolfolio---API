import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import Chart from "chart.js";
 import { DataTable } from "simple-datatables";
 import "./chart-area-demo.js";
 import "./chart-bar-demo.js";
 import "./chart-area-demo.js";
 import "./chart-area-demo.js";

import.meta.glob(["../img/**", "../fonts/**"]);

// Toggle the side navigation

const sidebarToggle = document.body.querySelector("#sidebarToggle");
if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
        event.preventDefault();

        document.body.classList.toggle("sb-sidenav-toggled");
        localStorage.setItem(
            "sb|sidebar-toggle",
            document.body.classList.contains("sb-sidenav-toggled")
        );
    });
}

// Simple-DataTables
// https://github.com/fiduswriter/Simple-DataTables/wiki

const datatablesSimple = document.getElementById("datatablesSimple");
if (datatablesSimple) {
    const dataTable = new DataTable(datatablesSimple);
}

//Modal delete
const deleteSubmitButtons = document.querySelectorAll(".delete-button");
if (deleteSubmitButtons) {
    deleteSubmitButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            event.preventDefault();

            const dataTitle = button.getAttribute("data-item-title");

            const modal = document.getElementById("deleteModal");

            const bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.show();

            const modalItemTitle = modal.querySelector("#modal-item-title");
            modalItemTitle.textContent = dataTitle;

            const buttonDelete = modal.querySelector("button.btn-primary");

            buttonDelete.addEventListener("click", () => {
                button.parentElement.submit();
            });
        });
    });
}

//Image preview on create
const previewImage = document.getElementById("image");
if (previewImage) {
    previewImage.addEventListener("change", (event) => {
        var oFReader = new FileReader();
        // var image  =  previewImage.files[0];
        // console.log(image);
        oFReader.readAsDataURL(previewImage.files[0]);

        oFReader.onload = function (oFREvent) {
            //console.log(oFREvent);
            document.getElementById("uploadPreview").src =
                oFREvent.target.result;
        };
    });
}
