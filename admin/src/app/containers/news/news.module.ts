import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { StoreModule } from "@context/store";

import { TableModule } from "@components/table";
import { FormModule } from "@components/form";

import { NewsTableComponent } from './news-table';
import { NewsFormComponent } from './news-form';



@NgModule({
    declarations: [NewsTableComponent, NewsFormComponent],
    imports: [
        CommonModule,
        StoreModule,
        TableModule,
        FormModule
    ],
    exports: [],
})
export class NewsModule {
}
