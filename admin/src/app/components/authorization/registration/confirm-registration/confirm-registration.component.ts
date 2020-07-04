import { Component, OnInit } from '@angular/core';

import { AuthorizationApiService } from "@app/api/authorization";

import { ActivatedRoute } from "@angular/router";

@Component({
  selector: 'app-confirm-registration',
  templateUrl: './confirm-registration.component.html',
  styleUrls: ['./confirm-registration.component.css']
})
export class ConfirmRegistrationComponent implements OnInit {

  constructor(private api: AuthorizationApiService,
              private activeRoute: ActivatedRoute) { }

  ngOnInit(): void {
    // subscribe добавить, когда будет налажена работа с токенами.
    // ответом с сервера будет токен
    console.log(this.activeRoute.snapshot.url[2].path);

    this.api.confirmRegistration(this.activeRoute.snapshot.url[2].path).subscribe(response => {
      console.log(response);
    });
  }

}
