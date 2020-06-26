import {NgModule} from "@angular/core";
import {CommonModule} from "@angular/common";
import {HomeComponent} from "./home.component";
import {RouterModule} from "@angular/router";
import { MatButtonModule } from "@angular/material/button";


@NgModule({
  declarations: [HomeComponent],
  imports: [
    CommonModule,
    RouterModule,
    MatButtonModule
  ]
})
export class HomeModule {
}
