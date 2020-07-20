import { Component, OnInit } from '@angular/core';
import { TokenService } from "@app/guards";


@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  public auth: boolean;

  constructor(private tokenService: TokenService) { }

  ngOnInit(): void {
    this.auth = this.tokenService.authenticated;
  }

}
