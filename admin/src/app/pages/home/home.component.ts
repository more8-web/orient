import { Component, OnInit } from '@angular/core';
import {AuthorizationApiService} from "@app/api/authorization";

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  public auth: boolean;

  constructor(private api: AuthorizationApiService) { }

  ngOnInit(): void {
    this.auth = this.api.authenticated;
  }

}
