import { Component, Input } from "@angular/core";
import { BlueCellComponent, GrayCellComponent } from "@components/table";
import { Columns, TableSchema } from "@components/table/table.types";
import { ContentCategory } from "@app/context";

@Component({
    selector: "app-content-category-table",
    templateUrl: "./content-category-table.component.html",
    styleUrls: ["./content-category-table.component.css"]
})
export class ContentCategoryTableComponent {
    @Input() values: ContentCategory[];

    columns: Columns = [
        {
            label: "Id",
            field: "id",
            classes: "col-md-1",
            component: {
                body: BlueCellComponent
            }
        },
        {
            label: "Parent Id",
            field: "parent",
            classes: "col-md-2"
        },
        {
            label: "Alias",
            field: "alias",
            classes: "col-md",
        }
    ];

    constructor() {
    }

    ngOnInit(): void {
    }

    get schema(): TableSchema {
        return {
            defaultCellComponent: {
                header: BlueCellComponent,
                body: GrayCellComponent
            },
            columns: this.columns,
        };
    }
}
