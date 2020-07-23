import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ContentCategoryComponent } from './content-category.component';



@NgModule({
    declarations: [ContentCategoryComponent],
    exports: [
        ContentCategoryComponent
    ],
    imports: [
        CommonModule
    ]
})
export class ContentCategoryModule { }
