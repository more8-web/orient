import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ContentCategoryComponent } from './content-category.component';
import { StoreModule } from "@app/context";
import { TableModule } from "@components/table";
import { ContentCategoryTableComponent } from "@containers/content-category/content-category-table";



@NgModule({
    declarations: [ContentCategoryComponent, ContentCategoryTableComponent],
    exports: [
        ContentCategoryComponent
    ],
    imports: [
        CommonModule,
        StoreModule,
        TableModule
    ]
})
export class ContentCategoryModule { }
