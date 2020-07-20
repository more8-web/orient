import { Injectable } from '@angular/core';
import {
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpInterceptor
} from '@angular/common/http';
import { Observable } from 'rxjs';
import { TokenService } from "@app/guards";

@Injectable()
export class AuthorizationInterceptor implements HttpInterceptor {

  constructor(
      private readonly tokenService: TokenService,
  ) {}

  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    request = request.clone({
      setHeaders: {
        Authorization: `Bearer ${this.tokenService.token}`
      }
    });
    return next.handle(request);
  }
}
