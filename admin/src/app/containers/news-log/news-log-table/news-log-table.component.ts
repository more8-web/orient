import { Component, Input } from "@angular/core";
import { BlueCellComponent, GrayCellComponent } from "@components/table";
import { Columns, TableSchema } from "@components/table/table.types";
import { NewsLog } from "@app/context";

@Component({
    selector: "app-news-log-table",
    templateUrl: "./news-log-table.component.html",
    styleUrls: ["./news-log-table.component.css"]
})
export class NewsLogTableComponent {
    @Input() values: NewsLog[];

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
            label: "News Id",
            field: "newsId",
            classes: "col-md-2",
        },
        {
            label: "User Id",
            field: "userId",
            classes: "col-md-2"
        },
        {
            label: "Event",
            field: "newsLogEvent",
            classes: "col-md-2",
            component: {
                body: BlueCellComponent
            }
        },
        {
            label: "Comment",
            field: "newsLogComment",
            classes: "col-md",
        },
        {
            label: "Date",
            field: "newsLogCreatedAt",
            classes: "col-md-2"
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
