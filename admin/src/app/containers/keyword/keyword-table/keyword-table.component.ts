import { Component, Input } from "@angular/core";
import { BlueCellComponent, GrayCellComponent } from "@components/table";
import { Columns, TableSchema } from "@components/table/table.types";
import { Keyword } from "@app/context";

@Component({
    selector: "app-keyword-table",
    templateUrl: "./keyword-table.component.html",
    styleUrls: ["./keyword-table.component.css"]
})
export class KeywordTableComponent {
    @Input() values: Keyword[];

    columns: Columns = [
        {
            label: "Id",
            field: "id",
            classes: "col-md-2",
            component: {
                body: BlueCellComponent
            }
        },
        {
            label: "Keyword",
            field: "value",
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
