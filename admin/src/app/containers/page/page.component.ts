import { Component, OnInit } from '@angular/core';
import { Page } from "../../context/models";
import { PageDispatcher, PageSelectors } from "../../context/store/page";

@Component({
  selector: 'app-page',
  templateUrl: './page.component.html',
  styleUrls: ['./page.component.css']
})
export class PageComponent implements OnInit {

    pages: Page[];

    constructor(private selector: PageSelectors,
                private dispatcher: PageDispatcher) {
    }

    ngOnInit(): void {
        this.dispatcher.load();
        this.selector.list().subscribe(data => this.pages = [...data]);

    }

}
