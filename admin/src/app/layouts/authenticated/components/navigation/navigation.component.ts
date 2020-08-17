import { Component, DoCheck, OnInit } from "@angular/core";
import { BreakpointObserver, Breakpoints } from "@angular/cdk/layout";
import { Observable } from "rxjs";
import { map, shareReplay } from "rxjs/operators";
import { TokenService } from "@app/guards";
import { FormControl } from "@angular/forms";


@Component({
    selector: "app-navigation",
    templateUrl: "./navigation.component.html",
    styleUrls: ["./navigation.component.css"]
})
export class NavigationComponent implements OnInit, DoCheck {

    public auth: boolean;

    constructor(private tokenService: TokenService) {
    }

    ngOnInit(): void {
    }


    ngDoCheck() {
        this.auth = this.tokenService.authenticated;
    }
}
