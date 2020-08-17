import {Component, OnInit} from "@angular/core";
import { BlueCellComponent, GrayCellComponent } from "@components/table";
import { Columns, TableSchema } from "@components/table/table.types";
import { Page, PageDispatcher, PageSelectors} from "@app/context";
import {Router} from "@angular/router";

@Component({
    selector: "app-page-table",
    templateUrl: "./page-table.component.html",
    styleUrls: ["./page-table.component.css"]
})
export class PageTableComponent implements OnInit {
    values: Page[];

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
            classes: "col-md-4",
        },
        {
            label: "URL",
            field: "url",
            classes: "col-md-4"
        },
        {
            label: "Template",
            field: "template",
            classes: "col-md"
        }
    ];

    constructor(private selector: PageSelectors,
                private dispatcher: PageDispatcher,
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
                onRowClick: id => this.router.navigate([`/pages/${id}`]),
            },
            columns: this.columns,
        };
    }
}
