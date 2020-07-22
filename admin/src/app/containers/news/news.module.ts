import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";

import { StoreModule } from "@context/store";

import { NewsComponent } from "./news.component";


@NgModule({
    declarations: [NewsComponent],
    imports: [
        CommonModule,
        StoreModule
    ],
    exports: [NewsComponent]
})
export class NewsModule {
}
