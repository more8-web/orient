import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { NewsCategoryComponent } from './news-category.component';
import { StoreModule } from "@app/context";
import { TableModule } from "@components/table";
import { NewsCategoryTableComponent } from "@containers/news-category/news-category-table";



@NgModule({
    declarations: [NewsCategoryComponent, NewsCategoryTableComponent],
    exports: [
        NewsCategoryComponent
    ],
    imports: [
        CommonModule,
        StoreModule,
        TableModule
    ]
})
export class NewsCategoryModule { }
