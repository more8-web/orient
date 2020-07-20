import { Component, OnInit } from "@angular/core";
import { TokenService } from "@app/guards";
import { Router } from "@angular/router";

@Component({
    selector: "app-logout-button",
    templateUrl: "./logout-button.component.html",
    styleUrls: ["./logout-button.component.css"]
})
export class LogoutButtonComponent implements OnInit {

    constructor(
        private readonly tokenService: TokenService,
        private router: Router
    ) {
    }

    ngOnInit(): void {
    }

    onSubmit() {
        this.tokenService.clear();
        this.router.navigateByUrl("");
    }

}
