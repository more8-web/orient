import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import {checkStorage} from "@app/_shared/storages";


@Injectable({
  providedIn: 'root'
})
export class AuthorizationGuard implements CanActivate {
  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): boolean {
    return Boolean(checkStorage());
  }

}
