import { Injectable } from "@angular/core";
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router } from "@angular/router";
import { TokenService } from "@app/guards/token.service";


@Injectable({
    providedIn: "root"
})
export class AuthorizationGuard implements CanActivate {

    constructor(private router: Router,
                private tokenService: TokenService) {
    }

    canActivate(
        route: ActivatedRouteSnapshot,
        state: RouterStateSnapshot): boolean {
        if (!this.tokenService.authenticated) {
            this.router.navigateByUrl("");
            return false;
        }
        return true;
    }

}
