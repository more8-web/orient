import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";

import { ContentComponent } from "./content.component";
import { StoreModule } from "@app/context";
import { TableModule } from "@components/table";
import { ContentTableComponent } from "@containers/content/content-table";


@NgModule({
    declarations: [ContentComponent, ContentTableComponent],
    exports: [ContentComponent],
    imports: [
        CommonModule,
        StoreModule,
        TableModule
    ]
})
export class ContentModule {
}
