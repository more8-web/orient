import { Component, Input } from "@angular/core";
import { BlueCellComponent, GrayCellComponent } from "@components/table";
import { Columns, TableSchema } from "@components/table/table.types";
import { NewsCategory } from "../../../context";

@Component({
    selector: "app-news-category-table",
    templateUrl: "./news-category-table.component.html",
    styleUrls: ["./news-category-table.component.css"]
})
export class NewsCategoryTableComponent {
    @Input() values: NewsCategory;

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
            classes: "col-md-3",
        },
        {
            label: "Alias",
            field: "alias",
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
