import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";

import { NewsModule } from "./news";
import { NewsCategoryModule } from "./news-category";


@NgModule({
    declarations: [],
    imports: [
        CommonModule,
        NewsModule,
        NewsCategoryModule
    ]
})
export class ContainersModule {
}
