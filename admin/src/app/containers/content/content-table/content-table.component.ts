import { Component, Input } from "@angular/core";

import { BlueCellComponent, GrayCellComponent } from "@components/table";
import { Columns, TableSchema } from "@components/table/table.types";
import { Content } from "@app/context";

@Component({
    selector: "app-content-table",
    templateUrl: "./content-table.component.html",
    styleUrls: ["./content-table.component.css"]
})
export class ContentTableComponent {
    @Input() values: Content[];

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
            label: "Alias",
            field: "alias",
            classes: "col-md-2",
        },
        {
            label: "Description",
            field: "description",
            classes: "col-md-4"
        },
        {
            label: "Value",
            field: "value",
            classes: "col-md"
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
