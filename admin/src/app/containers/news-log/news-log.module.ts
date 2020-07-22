import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NewsLogComponent } from './news-log.component';



@NgModule({
    declarations: [NewsLogComponent],
    exports: [
        NewsLogComponent
    ],
    imports: [
        CommonModule
    ]
})
export class NewsLogModule { }
