import {Component, OnInit} from "@angular/core";
import {Router} from "@angular/router";
import {checkStorage} from "@app/_shared/storages";

@Component({
  selector: "app-logout-button",
  templateUrl: "./logout-button.component.html",
  styleUrls: ["./logout-button.component.css"]
})
export class LogoutButtonComponent implements OnInit {

  constructor(private router: Router) {
  }

  ngOnInit(): void {
  }

  onSubmit() {
    if (checkStorage() === localStorage.getItem("X-AUTH-TOKEN")) {
      localStorage.removeItem("X-AUTH-TOKEN");
    } else {
      sessionStorage.removeItem("X-AUTH-TOKEN");
    }
    window.location.reload();
  }

}
