import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree, Router } from "@angular/router";
import { Observable } from 'rxjs';
import { TokenService } from "./token.service";

@Injectable({
  providedIn: 'root'
})
export class ForAuthorizatedGuard implements CanActivate {
    constructor(private router: Router,
                private tokenService: TokenService) {}

    canActivate(
        route: ActivatedRouteSnapshot,
        state: RouterStateSnapshot): boolean {
        if (this.tokenService.authenticated) {
            this.router.navigateByUrl("/dashboard");
            return false;
        }
        return true;
    }

}
