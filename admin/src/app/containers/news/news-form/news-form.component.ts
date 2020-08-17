import { Component, OnInit } from "@angular/core";
import { News, NewsDispatcher, NewsSelector } from "@app/context";

import { Fields, FormSchema } from "@components/form/form.types";
import { InputComponent, SelectComponent } from "@components/form";
import { ActivatedRoute } from "@angular/router";
import { ButtonComponent } from "@components/form/button";
import { FormService } from "@app/services/form.service";

@Component({
    selector: "app-news-form",
    templateUrl: "./news-form.component.html",
    styleUrls: ["./news-form.component.css"]
})
export class NewsFormComponent implements OnInit {

    values: News;

    fields: Fields = [
        {
            label: "Alias",
            property: "alias",
            classes: "col-md-12",
            component: InputComponent,
        },
        {
            label: "Status",
            property: "status",
            classes: "col-md-12",
            component: SelectComponent,
        },
        {
            label: "Save",
            property: "save",
            classes: "col-md-6",
            component: ButtonComponent,
        },
        {
            label: "Back",
            property: "back",
            classes: "col-md-6",
            component: ButtonComponent,
        }
    ];

    constructor(
        private selector: NewsSelector,
        private dispatcher: NewsDispatcher,
        private router: ActivatedRoute,
        private formService: FormService
    ) {
        this.formService.fromClick().subscribe(data => {
            console.log(data);
        })
    }

    ngOnInit(): void {
        const id: number = this.router.snapshot.params["id"];

        this.dispatcher.load();

        this.dispatcher.select(id);
        this.selector.selected().subscribe(data => this.values = data);
    }

    get schema(): FormSchema {
        return {
            fields: this.fields,
        };
    }

}
