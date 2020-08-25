import {Component, forwardRef, OnInit} from '@angular/core';
import {FormBuilder, FormControl, FormGroup, NG_VALUE_ACCESSOR, Validators} from "@angular/forms";
import {PageDispatcher, PageSelectors} from "@app/context";
import {ActivatedRoute, Router} from "@angular/router";

@Component({
    selector: 'app-page-form',
    templateUrl: './update-page-form.component.html',
    styleUrls: ['./update-page-form.component.css'],
    providers: [
    {
        provide: NG_VALUE_ACCESSOR,
        multi: true,
        useExisting: forwardRef(() => UpdatePageFormComponent),
    }
]
})
export class UpdatePageFormComponent implements OnInit {
    pageForm: FormGroup;

    alias: string;
    url: string;
    template: string;
    id: number = this.activatedRoute.snapshot.params.id;

    constructor(private fb: FormBuilder,
                private selector: PageSelectors,
                private dispatcher: PageDispatcher,
                private activatedRoute: ActivatedRoute,
                private router: Router) {
    }

    ngOnInit(): void {
        this.dispatcher.load();
        this.dispatcher.select(this.id);
        this.selector.selected().subscribe(page => {
            console.log(page);
            if (page) {
                this.alias = page.alias;
                this.url = page.url;
                this.template = page.template;
            }
        });

        this.pageForm = new FormGroup({
            alias: new FormControl(Validators.required),
            url: new FormControl(),
            template: new FormControl(),
        }, Validators.required);

        console.log(this.pageForm);
    }

    aliasInput(value) {
        this.alias = value;
    }

    urlInput(value) {
        this.url = value;
    }

    templateInput(value) {
        this.template = value;
    }

    onClick(status) {
        console.log(status);
        if (status === "Save") {
            const page = {
                id: this.id,
                alias: this.alias,
                url: this.url,
                template: this.template
            };
            this.dispatcher.update(page);
        } else if (status === "Back") {
            this.router.navigate(["/pages"]);
        }
    }
}
