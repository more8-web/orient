import {NgModule} from "@angular/core";
import {CommonModule} from "@angular/common";

import {AuthorizationModule} from "@pages/authorization";
import {DashboardModule} from "@pages/dashboard";
import {HomeModule} from "@pages/home";

import { MatGridListModule } from '@angular/material/grid-list';
import { MatCardModule } from '@angular/material/card';
import { MatMenuModule } from '@angular/material/menu';
import { MatIconModule } from '@angular/material/icon';
import { MatButtonModule } from '@angular/material/button';
import { LayoutModule } from '@angular/cdk/layout';

@NgModule({
  declarations: [],
  exports: [],
  imports: [
    CommonModule,
    AuthorizationModule,
    DashboardModule,
    HomeModule,
    MatGridListModule,
    MatCardModule,
    MatMenuModule,
    MatIconModule,
    MatButtonModule,
    LayoutModule
  ]
})
export class PagesModule {
}
