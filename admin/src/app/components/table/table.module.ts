import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { TableComponent } from "./table.component";
import { BaseRowComponent } from "./rows/base-row";
import {
    BaseCellComponent,
    BlueCellComponent,
    GrayCellComponent
} from "./cells";

@NgModule({
    declarations: [
        TableComponent,
        BaseRowComponent,
        BaseCellComponent,
        BlueCellComponent,
        GrayCellComponent,
    ],
    exports: [
        TableComponent
    ],
    imports: [
        CommonModule
    ]
})
export class TableModule {
}
