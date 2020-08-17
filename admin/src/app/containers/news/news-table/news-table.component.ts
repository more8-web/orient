import {Component, OnInit} from "@angular/core";
import { BlueCellComponent, GrayCellComponent } from "@components/table";
import { Columns, TableSchema } from "@components/table/table.types";
import { News, NewsDispatcher, NewsSelector } from "@app/context";
import { Router } from "@angular/router";

@Component({
    selector: "app-news-table",
    templateUrl: "./news-table.component.html",
    styleUrls: ["./news-table.component.css"]
})
export class NewsTableComponent implements OnInit {
    values: News[];

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
            classes: "col-md",
        },
        {
            label: "Status",
            field: "status",
            classes: "col-md-2"
        }
    ];

    constructor(private selector: NewsSelector,
                private dispatcher: NewsDispatcher,
                private router: Router) {
    }

    ngOnInit(): void {
        this.dispatcher.load();
        this.selector.list().subscribe(data => this.values = [...data]);
    }

    get schema(): TableSchema {
        return {
            defaultCellComponent: {
                header: BlueCellComponent,
                body: GrayCellComponent
            },
            behaviours: {
                onRowClick: id => this.router.navigate([`/news/${id}`]),
            },
            columns: this.columns,
        };
    }
}
