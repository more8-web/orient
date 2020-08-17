import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NewsLogComponent } from './news-log.component';
import { StoreModule } from "@app/context";
import { TableModule } from "@components/table";
import { NewsLogTableComponent } from "@containers/news-log/news-log-table";



@NgModule({
    declarations: [NewsLogComponent, NewsLogTableComponent],
    exports: [
        NewsLogComponent
    ],
    imports: [
        CommonModule,
        StoreModule,
        TableModule
    ]
})
export class NewsLogModule { }
