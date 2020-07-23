import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { NewsCategoryComponent } from './news-category.component';



@NgModule({
    declarations: [NewsCategoryComponent],
    exports: [
        NewsCategoryComponent
    ],
    imports: [
        CommonModule
    ]
})
export class NewsCategoryModule { }
